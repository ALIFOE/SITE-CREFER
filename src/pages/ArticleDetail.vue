<template>
  <div class="min-h-screen bg-gradient-to-b from-slate-50 via-white to-slate-50">
    <!-- Header Section -->
    <section
      class="relative py-8 px-4 sm:px-6 lg:px-8 overflow-hidden bg-cover bg-center"
      :style="{ backgroundImage: `url(${backgroundImageUrl})` }"
    >
      <!-- Dark overlay for contrast -->
      <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50 z-10"></div>
      <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-slate-950 via-black/60 to-transparent z-15"></div>
      
      <div class="max-w-6xl mx-auto relative z-20 pt-28 pb-8">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4 leading-tight" style="font-family: 'Montserrat', sans-serif; letter-spacing: -0.5px;">{{ currentArticle.title }}</h1>
        <p class="text-lg lg:text-xl text-slate-200">{{ currentArticle.subtitle }}</p>
      </div>
    </section>

    <!-- Article Detail Section -->
    <section class="py-16 bg-gradient-to-b from-slate-50 via-white to-slate-50">
      <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <!-- Article Card -->
        <article class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 overflow-hidden">
          <!-- Post Header -->
          <div class="px-6 py-4 border-b border-gray-100">
            <div class="flex items-center justify-between mb-2">
              <h3 class="text-sm font-bold text-gray-900">CREFER 🎓</h3>
              <span class="text-xs text-gray-500">{{ currentArticle.date }}</span>
            </div>
            <p class="text-sm text-gray-600">{{ currentArticle.category }}</p>
          </div>

          <!-- Post Content -->
          <div class="px-6 py-4">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ currentArticle.fullTitle }}</h2>
            <p class="text-gray-700 mb-4 leading-relaxed">
              {{ currentArticle.description }}
            </p>
            <div class="mt-6 pt-4 border-t border-gray-200">
              <p class="text-gray-700 leading-relaxed">
                {{ currentArticle.fullContent }}
              </p>
            </div>
          </div>

          <!-- Post Gallery -->
          <div v-if="currentArticle.images.length > 1" class="grid grid-cols-2 gap-1 w-full h-96 bg-gray-100">
            <div 
              v-for="(image, index) in currentArticle.images" 
              :key="index"
              class="overflow-hidden cursor-pointer group"
              @click="openLightbox(index)"
            >
              <img 
                :src="image" 
                :alt="`Image ${index + 1}`" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
          </div>
          <div v-else class="w-full h-96 bg-gray-100 overflow-hidden">
            <img 
              :src="currentArticle.images[0]" 
              alt="Article Image" 
              class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 cursor-pointer"
              @click="openLightbox(0)"
            />
          </div>

          <!-- Back Button -->
          <div class="px-6 py-4 border-t border-gray-100">
            <router-link
              to="/articles"
              class="inline-flex items-center gap-2 py-2 px-4 rounded-lg bg-yellow-50 hover:bg-yellow-100 text-yellow-700 font-semibold transition-all duration-200"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
              Retour aux articles
            </router-link>
          </div>
        </article>
      </div>
    </section>

    <!-- Lightbox Modal -->
    <div 
      v-if="showLightbox" 
      class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center p-4"
      @click="closeLightbox"
    >
      <div class="relative max-w-4xl w-full" @click.stop>
        <button 
          @click="closeLightbox"
          class="absolute -top-12 right-0 text-white hover:text-yellow-400 transition-colors"
        >
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <img 
          :src="currentArticle.images[currentLightboxIndex]" 
          :alt="`Image ${currentLightboxIndex + 1}`" 
          class="w-full h-auto rounded-lg" 
        />
        <button 
          v-if="currentLightboxIndex > 0"
          @click="previousImage"
          class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-yellow-400 transition-colors"
        >
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button 
          v-if="currentLightboxIndex < currentArticle.images.length - 1"
          @click="nextImage"
          class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-yellow-400 transition-colors"
        >
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed, onMounted, watch, onBeforeUnmount } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useSEO } from '@/composables/useSEO'
import { articlesData } from '@/data/articlesData'

export default {
  name: 'ArticleDetail',
  setup() {
    const route = useRoute()
    const router = useRouter()
    const seo = useSEO()
    const showLightbox = ref(false)
    const currentLightboxIndex = ref(0)

    // Function to update meta tags for social sharing (Facebook-like structure)
    const updateMetaTags = (article) => {
      const baseUrl = window.location.origin
      const imageUrl = article.ogImage || (article.images && article.images.length > 0 ? article.images[0] : '')
      const pageUrl = `${baseUrl}/articles/${article.id}`

      // Supprimer les anciennes métadonnées
      const oldMetaSelectors = [
        'meta[property="og:title"]',
        'meta[property="og:description"]',
        'meta[property="og:image"]',
        'meta[property="og:image:width"]',
        'meta[property="og:image:height"]',
        'meta[property="og:type"]',
        'meta[property="og:url"]',
        'meta[property="og:site_name"]',
        'meta[property="article:published_time"]',
        'meta[property="article:author"]',
        'meta[property="article:section"]',
        'meta[name="twitter:card"]',
        'meta[name="twitter:title"]',
        'meta[name="twitter:description"]',
        'meta[name="twitter:image"]',
        'meta[name="description"]'
      ]

      oldMetaSelectors.forEach(selector => {
        const element = document.querySelector(selector)
        if (element) {
          element.remove()
        }
      })

      // Métadonnées Open Graph (protocole Facebook)
      const metaTags = [
        { property: 'og:title', content: article.title },
        { property: 'og:description', content: article.ogDescription || article.description },
        { property: 'og:image', content: imageUrl },
        { property: 'og:image:width', content: '1200' },
        { property: 'og:image:height', content: '630' },
        { property: 'og:type', content: 'article' },
        { property: 'og:url', content: pageUrl },
        { property: 'og:site_name', content: 'CREFER' },
        { property: 'article:published_time', content: new Date().toISOString() },
        { property: 'article:author', content: 'CREFER' },
        { property: 'article:section', content: article.category },
        { name: 'twitter:card', content: 'summary_large_image' },
        { name: 'twitter:title', content: article.title },
        { name: 'twitter:description', content: article.ogDescription || article.description },
        { name: 'twitter:image', content: imageUrl },
        { name: 'description', content: article.ogDescription || article.description }
      ]

      // Ajouter les nouvelles métadonnées
      metaTags.forEach(tag => {
        const meta = document.createElement('meta')
        if (tag.property) {
          meta.setAttribute('property', tag.property)
        } else {
          meta.setAttribute('name', tag.name)
        }
        meta.setAttribute('content', tag.content)
        document.head.appendChild(meta)
      })

      // Ajouter le lien canonique
      let canonicalLink = document.querySelector('link[rel="canonical"]')
      if (!canonicalLink) {
        canonicalLink = document.createElement('link')
        canonicalLink.rel = 'canonical'
        document.head.appendChild(canonicalLink)
      }
      canonicalLink.href = pageUrl

      // Mettre à jour le title du document
      document.title = `${article.title} - CREFER`
    }
    
    const backgroundImageUrl = ref(new URL('../assets/images/imageback.jpg', import.meta.url).href)

    const currentArticle = computed(() => {
      const articleId = parseInt(route.params.id)
      const article = articlesData.find(a => a.id === articleId)
      return article || articlesData[0]
    })

    // Update meta tags when article changes
    onMounted(() => {
      updateMetaTags(currentArticle.value)
      
      // Configurer le SEO
      seo.setSEO({
        title: `${currentArticle.value.title} - CREFER`,
        description: currentArticle.value.ogDescription || currentArticle.value.description,
        keywords: `${currentArticle.value.category}, CREFER, actualités, articles`,
        canonical: `https://crefer.tech/articles/${currentArticle.value.id}`
      })
      
      window.addEventListener('keydown', handleKeydown)
    })

    onBeforeUnmount(() => {
      window.removeEventListener('keydown', handleKeydown)
    })

    watch(currentArticle, (newArticle) => {
      updateMetaTags(newArticle)
    })

    const openLightbox = (index) => {
      currentLightboxIndex.value = index
      showLightbox.value = true
      document.body.style.overflow = 'hidden'
    }

    const closeLightbox = () => {
      showLightbox.value = false
      document.body.style.overflow = 'auto'
    }

    const nextImage = () => {
      if (currentLightboxIndex.value < currentArticle.value.images.length - 1) {
        currentLightboxIndex.value++
      }
    }

    const previousImage = () => {
      if (currentLightboxIndex.value > 0) {
        currentLightboxIndex.value--
      }
    }

    // Handle keyboard events for lightbox navigation
    const handleKeydown = (event) => {
      if (!showLightbox.value) return

      if (event.key === 'Escape') {
        closeLightbox()
      } else if (event.key === 'ArrowRight') {
        nextImage()
      } else if (event.key === 'ArrowLeft') {
        previousImage()
      }
    }

    return {
      backgroundImageUrl,
      currentArticle,
      showLightbox,
      currentLightboxIndex,
      openLightbox,
      closeLightbox,
      nextImage,
      previousImage
    }
  }
}
</script>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

article {
  animation: fadeIn 0.3s ease-out;
}
</style>
