import Alpine from 'alpinejs'

window.Alpine = Alpine

// Scroll-animate observer
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view')
            }
        })
    }, { threshold: 0.15, rootMargin: '0px 0px -50px 0px' })

    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el))
})

Alpine.start()
