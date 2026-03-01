const { createDirectus, staticToken, rest, readMe } = require('@directus/sdk');
const fs = require('fs');
const path = require('path');

// Basic env parser (same as in test-shorts-collection.js)
const envPath = path.resolve(__dirname, '../../.env');
const envContent = fs.readFileSync(envPath, 'utf8');
const env = {};
envContent.split('\n').forEach(line => {
    const match = line.match(/^\s*([^#\s][^=]*)\s*=\s*(.*)$/);
    if (match) {
        let value = match[2].trim();
        if (value.startsWith('"') && value.endsWith('"')) value = value.slice(1, -1);
        if (value.startsWith("'") && value.endsWith("'")) value = value.slice(1, -1);
        env[match[1]] = value;
    }
});

const url = env.VITE_DIRECTUS_URL;
const token = env.VITE_DIRECTUS_TOKEN;

async function verifyAuth() {
    try {
        console.log('--- Directus Authentication Verification ---');
        console.log('Directus URL:', url);
        console.log('Token Length:', token ? token.length : 0);

        if (!token) {
            console.error('ERROR: VITE_DIRECTUS_TOKEN not found in .env');
            return;
        }

        const client = createDirectus(url).with(staticToken(token)).with(rest());

        console.log('Attempting to fetch current user (readMe)...');
        const user = await client.request(readMe());

        if (user && user.id) {
            console.log('SUCCESS: Token is valid and authenticates correctly!');
            console.log('Authenticated User ID:', user.id);
            console.log('Authenticated User Email:', user.email);
            console.log('Authenticated User Role ID:', user.role);
            console.log('User First Name:', user.first_name);
        } else {
            console.warn('WARNING: Token provided but no user information returned. (Is it a public token or limited?)');
        }
    } catch (error) {
        console.error('ERROR: Authentication failed!');
        console.error('Error Status:', error.status || 'N/A');
        console.error('Error Code:', error.code || 'N/A');
        console.error('Error Message:', error.message);
        
        if (error.response) {
            console.error('Response Data:', JSON.stringify(error.response.data, null, 2));
        }
        
        if (error.status === 401) {
            console.error('HINT: The token is invalid or unauthorized (Unauthorized).');
        } else if (error.status === 403) {
            console.error('HINT: The token is valid, but doesn\'t have permission to read "me" (Forbidden).');
        }
    }
}

verifyAuth();
