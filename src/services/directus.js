import { createDirectus, staticToken, rest, readMe } from '@directus/sdk';

const DIRECTUS_URL = (typeof import.meta.env !== 'undefined' ? import.meta.env.VITE_DIRECTUS_URL : process.env.VITE_DIRECTUS_URL) || 'https://admin-direct.crefer.tech';
const DIRECTUS_TOKEN = typeof import.meta.env !== 'undefined' ? import.meta.env.VITE_DIRECTUS_TOKEN : process.env.VITE_DIRECTUS_TOKEN;

console.log('Directus URL:', DIRECTUS_URL);
console.log('Directus Token Status:', DIRECTUS_TOKEN ? `PRESENT (Length: ${DIRECTUS_TOKEN.length}, Starting: ${DIRECTUS_TOKEN.substring(0, 4)}...)` : 'MISSING');


const createClient = async () => {
  let client = createDirectus(DIRECTUS_URL).with(rest());
  
  if (DIRECTUS_TOKEN) {
    client = client.with(staticToken(DIRECTUS_TOKEN));
    try {
      const user = await client.request(readMe());
      console.log('Directus: Authenticated as', user.email);
    } catch (error) {
      console.error('Directus: Authentication check failed', error.message);
    }
  }
  
  return client;
};

export const directus = await createClient();