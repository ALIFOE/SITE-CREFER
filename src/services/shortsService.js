import { directus } from './directus';
import { readItems } from '@directus/sdk';
import { ref } from 'vue';

export const useShorts = () => {
  const shorts = ref([]);
  const loading = ref(false);
  const error = ref(null);

  // Fallback data in case Directus fails
  const defaultShorts = [
    {
      id: 1,
      youtubeId: 'QCx-BY9Ciz8',
      title: 'Regardez la vidéo et dites-nous ce que vous en pensez en commentaires ⬇️ #Apprentissage #Continue'
    },
    {
      id: 2,
      youtubeId: 'gcjje_T9suM',
      title: 'Chaque réussite est le fruit d\'un rêve nourri par la discipline et l\'effort. #CREFER 🇹🇬'
    },
    {
      id: 3,
      youtubeId: 'J1xR0FdaOBw',
      title: 'De la salle de cours à l’atelier !'
    }
  ];

  const fetchShorts = async () => {
    loading.value = true;
    try {
      // Assuming 'shorts' collection in Directus
      const response = await directus.request(readItems('Shorts', {
          sort: ['-date_created'], // Using date_created for sorting as ID is a UUID
          filter: {
            status: {
              _eq: 'published'
            }
          }
      }));
      shorts.value = response;
    } catch (err) {
      console.error('Error fetching shorts from Directus:', err);
      error.value = err;
      // Fallback to default shorts
      shorts.value = defaultShorts;
    } finally {
      loading.value = false;
    }
  };

  return {
    shorts,
    loading,
    error,
    fetchShorts
  };
};
