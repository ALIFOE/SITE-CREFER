import { createDirectus, staticToken, rest, readMe } from '@directus/sdk';

const DIRECTUS_URL = (typeof import.meta.env !== 'undefined' ? import.meta.env.VITE_DIRECTUS_URL : process.env.VITE_DIRECTUS_URL) || 'https://admin-direct.crefer.tech';
const DIRECTUS_TOKEN = typeof import.meta.env !== 'undefined' ? import.meta.env.VITE_DIRECTUS_TOKEN : process.env.VITE_DIRECTUS_TOKEN;

const createClient = async () => {
  let client = createDirectus(DIRECTUS_URL).with(rest());
  
  if (DIRECTUS_TOKEN) {
    client = client.with(staticToken(DIRECTUS_TOKEN));
    try {
      const user = await client.request(readMe());
      console.log('Directus: Authenticated');
    } catch (error) {
      console.error('Directus: Authentication check failed', error.message);
    }
  }
  
  return client;
};

const directus = await createClient();

export default directus;