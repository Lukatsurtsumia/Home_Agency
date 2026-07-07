import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('[data-section-fade]');

    if (!('IntersectionObserver' in window) || sections.length === 0) {
        sections.forEach(s => s.classList.add('in-view'));
        return;
    }

    const observer = new IntersectionObserver(
        entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.25
        }
    );

    sections.forEach(section => {
        observer.observe(section);
    });
});
//Slide Show 
 
document.addEventListener('DOMContentLoaded', () => {
    // Smooth scroll for same-page section links (e.g. "/#services").
    // Links to a section on another page (e.g. viewed from a portfolio detail
    // page) are left alone so the browser navigates there normally.
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const url = new URL(this.href, window.location.href);
            if (url.pathname !== window.location.pathname || !url.hash) return;

            const target = document.querySelector(url.hash);
            if (!target) return;
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // Hero slideshow using data from Laravel
    const dataTag = document.getElementById('hero-slides-data');
    if (!dataTag) return;

    let slides;
    try {
        slides = JSON.parse(dataTag.textContent.trim());
    } catch (e) {
        return;
    }
    if (!Array.isArray(slides) || slides.length <= 1) return;

    const bg    = document.getElementById('hero-bg');
    const label = document.getElementById('hero-label');
    const title = document.getElementById('hero-title');
    const text  = document.getElementById('hero-text');
    const meta1 = document.getElementById('hero-meta-1');
    const meta2 = document.getElementById('hero-meta-2');

    if (!bg || !label || !title || !text || !meta1 || !meta2) return;

    let index = 0;
    const changeSlide = () => {
        index = (index + 1) % slides.length;
        const slide = slides[index];

        bg.style.backgroundImage = `url('${slide.image}')`;
        label.textContent = slide.label;
        title.textContent = slide.title;
        text.textContent  = slide.text;
        meta1.textContent = slide.meta1;
        meta2.textContent = slide.meta2;
    };

    setInterval(changeSlide, 7000); // every 7s
});
 
//Nav Bar Toggle
document.getElementById('mobile-menu-button')
    ?.addEventListener('click', function() {
        document.getElementById('mobile-menu')
            .classList.toggle('hidden');
});

//Service Cards Animation
document.addEventListener('DOMContentLoaded', () => {

    const cards = document.querySelectorAll('.service-card');

    const observer = new IntersectionObserver((entries, observer) => {

        entries.forEach((entry, index) => {

            if (entry.isIntersecting) {

                setTimeout(() => {
                    entry.target.classList.add('in-view');
                }, index * 300); // stagger animation

                observer.unobserve(entry.target);
            }

        });

    }, { threshold: 0.15 });

    cards.forEach(card => observer.observe(card));

});

//Portfolio Scroll Dots (mobile)
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('portfolio-track');
    const dots = document.querySelectorAll('.portfolio-dot');
    const cards = document.querySelectorAll('[data-portfolio-card]');

    if (!track || dots.length === 0 || cards.length === 0) return;

    const setActiveDot = (index) => {
        dots.forEach(dot => {
            const isActive = dot.dataset.index === String(index);
            dot.classList.toggle('bg-sky-400', isActive);
            dot.classList.toggle('w-4', isActive);
            dot.classList.toggle('bg-slate-700', !isActive);
        });
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setActiveDot(entry.target.dataset.index);
            }
        });
    }, { root: track, threshold: 0.6 });

    cards.forEach(card => observer.observe(card));
});

//Map Component
document.addEventListener('DOMContentLoaded', () => {
    if (typeof L === 'undefined') return;

    const soldDataTag = document.getElementById('sold-apartments-data');
    const soldMapContainer = document.getElementById('sold-map');
    if (!soldDataTag || !soldMapContainer) return;

    let sold;
    try {
        sold = JSON.parse(soldDataTag.textContent.trim());
    } catch {
        sold = [];
    }
    if (!Array.isArray(sold) || sold.length === 0) return;

    // Limit map to Tbilisi
    const tbilisiBounds = L.latLngBounds(
        [41.63, 44.70], // SW
        [41.83, 44.95]  // NE
    );

    const map = L.map('sold-map', {
        scrollWheelZoom: false,
        maxBounds: tbilisiBounds,
        maxBoundsViscosity: 0.8
    }).setView([41.697102, 44.773674], 10); // Tbilisi center

    // MapTiler hybrid (your key)
    const key = 'Nmd9TjFqrbUtIvAh1AKT';

  L.tileLayer(
    `https://api.maptiler.com/maps/streets-v2/{z}/{x}/{y}.png?key=${key}`,
    {
        tileSize: 512,
        zoomOffset: -1,
        maxZoom: 19,
        crossOrigin: true,
        attribution:
            '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> ' +
            '<a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }
).addTo(map);

    const markersById = {};
    const markers = [];

    // Add apartment markers
    sold.forEach(item => {
        const marker = L.marker([item.lat, item.lng])
            .addTo(map)
            .bindPopup(`<strong>${item.title}</strong><br>${item.address}`);

        markersById[item.id] = marker;
        markers.push(marker);
    });

    // Fit map to all apartments
    // if (markers.length > 0) {
    //     const group = L.featureGroup(markers);
    //     const bounds = group.getBounds();
    //     map.fitBounds(bounds.pad(0.2));
    // }

    // Click list -> focus marker
   document.querySelectorAll('[data-apartment-id]').forEach(el => {
    el.addEventListener('click', () => {
        const id = Number(el.getAttribute('data-apartment-id'));
        const marker = markersById[id];
        if (!marker) return;

        const ll = marker.getLatLng();
        map.setView(ll, 14, { animate: true });
        marker.openPopup();
    });
});
});