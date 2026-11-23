import { createIcons } from 'lucide';

document.addEventListener('DOMContentLoaded', () => {
    createIcons();

    const header = document.querySelector('[data-site-header]');

    if (header) {
        const updateHeaderSize = () => {
            header.classList.toggle('is-compact', window.scrollY > 24);
        };

        updateHeaderSize();
        window.addEventListener('scroll', updateHeaderSize, { passive: true });
    }
});