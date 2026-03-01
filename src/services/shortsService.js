import directus from './directus';
import {readItems, readCollections} from '@directus/sdk';
import {ref} from 'vue';
import {createRouter as logs} from "vue-router";

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
      // Find the collection name (case-insensitive) as done in test-shorts-collection.js
      const collections = await directus.request(readCollections());

      const shortsCollection = collections.find(c => c.collection.toLowerCase() === 'shorts');
      
      const collectionName = shortsCollection ? shortsCollection.collection : 'shorts';

      // Request items from the correctly identified collection
      const response = await directus.request(readItems(collectionName, {
        filter: {
          status: {
            _eq: 'published'
          }
        }
      }));
      
      // Map 'titre' from Directus to 'title' for the frontend as verified in the test script
      shorts.value = response.map(item => ({
        ...item,
        title: item.titre || item.title
      }));
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
