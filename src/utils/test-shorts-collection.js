const { createDirectus, staticToken, rest, readItems, readCollections } = require('@directus/sdk');
const fs = require('fs');
const path = require('path');

// Basic env parser
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

const client = createDirectus(url).with(staticToken(token)).with(rest());

async function run() {
    try {
        console.log('Directus URL:', url);
        console.log('Fetching collections...');
        const collections = await client.request(readCollections());
        const shortsCollection = collections.find(c => c.collection.toLowerCase() === 'shorts');

        if (shortsCollection) {
            console.log(`Found collection: ${shortsCollection.collection}`);
            const items = await client.request(readItems(shortsCollection.collection));
            console.log('First item sample:');
            console.log(JSON.stringify(items[0], null, 2));
            console.log(`Total items: ${items.length}`);

            // Check published items as shortsService.js filters by status
            const publishedItems = items.filter(i => i.status === 'published');
            console.log(`Published items: ${publishedItems.length}`);
            if (publishedItems.length > 0) {
                console.log('First published item:');
                console.log(JSON.stringify(publishedItems[0], null, 2));
            }
        } else {
            console.log('Collection "shorts" (or "Shorts") not found');
            console.log('Available collections:', collections.map(c => c.collection).join(', '));
        }
    } catch (error) {
        console.error('Error fetching data:', error.message);
        if (error.response) {
            console.error('Response data:', JSON.stringify(error.response.data, null, 2));
        }
    }
}

run();
