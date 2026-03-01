import { createDirectus, rest } from '@directus/sdk';

// Default base URL for self-hosted instance (adjust as needed via env)
const DIRECTUS_URL = import.meta.env.VITE_DIRECTUS_URL || 'https://crefer.tech/directus';

export const directus = createDirectus(DIRECTUS_URL).with(rest());
