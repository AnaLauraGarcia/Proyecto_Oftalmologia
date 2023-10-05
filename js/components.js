const component1 = {
    // Header
    template: `
    <div class="container">
            <div class="header-row">
                <a href="index.html" class="logo">
                    <img src="img/logo.webp" alt="Logo">
                </a>
                <nav class="nav">
                    <ul class="menu">
                        <li class="menu-item"><a href="about.html" class="nav__link">Nosotros</a></li>
                        <li class="menu-item"><a href="professionals.html" class="nav__link">Profesionales</a></li>
                        <li class="menu-item"><a href="services.html" class="nav__link">Especialidades</a>
                            <ul class="submenu">
                                <li class="submenu-item"><a href="services.html#oculista"
                                        class="nav__link">Oculista</a></li>
                                <li class="submenu-item"><a href="services.html#oftalmologia"
                                        class="nav__link">Oftalmología</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a href="turns.html" class="nav__link">Mis Turnos</a></li>
                        <li class="menu-item"><a href="contact.html" class="nav__link">Contacto</a></li>
                    </ul>
                </nav>
                <div class="nav-buttons">
                    <a href="new_turn.php" class="button shift-button">Solicitar Turno</a>
                    <a href="login.php" class="button login-button">Login</a>
                </div>
                <div class="menu-responsive" id="menu-responsive">
                    <ul class="menu">
                        <li class="menu-item"><a href="about.html" class="nav__link">Nosotros</a></li>
                        <li class="menu-item"><a href="professionals.html" class="nav__link">Profesionales</a></li>
                        <li class="menu-item"><a href="services.html" class="nav__link">Especialidades</a></li>
                        <li class="menu-item"><a href="turns.html" class="nav__link">Mis Turnos</a></li>
                        <li class="menu-item"><a href="contact.html" class="nav__link">Contacto</a></li>
                        <a href="new_turn.php" class="button shift-button">Solicitar Turno</a>
                        <a href="login.php" class="button login-button">Login</a>
                    </ul>
                </div>
                <div class="burger" id="burger">
                    <span id="icon"></span>
                </div>
            </div>
        </div>
    `
}
const component2 = {
    // Footer
    template: `
    <div class="container">
            <div class="footer-grid">
                <div class="footer-flex">
                    <div>
                        <a href="index.html" class="logo logo-footer">
                            <img src="img/logo.webp" alt="Logo" width="70px">
                        </a>
                    </div>
                    <div class="footer-contact">
                        <p>Centro de Salud Integral - Sede Central</p>
                        <p>
                            <a href="https://goo.gl/maps/iJ6LPjHcGrDyqUcw8" target="_blank">Ana María Janer 2300,
                                C1437HGJ CABA</a>
                        </p>
                        <p>
                            <a href="mailto:centrosaludintegral@gmail.com"
                                target="_blank">centrosaludintegral@gmail.com</a>
                        </p>
                        <p>
                            <a href="tel:(+54 11) 2358 - 0400">(+54 11) 2358 - 0400</a>
                        </p>
                    </div>
                    <div class="social-icons">
                        <h4>
                            Seguinos
                        </h4>
                        <a href="https://www.facebook.com/" class="social-icon" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                                width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/" class="social-icon" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram"
                                width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="16" height="16" rx="4" />
                                <circle cx="12" cy="12" r="3" />
                                <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/" class="social-icon" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-linkedin"
                                width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="8" y1="11" x2="8" y2="16" />
                                <line x1="8" y1="8" x2="8" y2="8.01" />
                                <line x1="12" y1="16" x2="12" y2="11" />
                                <path d="M16 16v-3a2 2 0 0 0 -4 0" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="copyrights">
                    <p>Copyright © 2023 Centro de Salud Integral.</p>
                    <p id="copyrights__name">All Rights Reserved. Designed and Developed by ❤ by Ana García</p>
                </div>
            </div>
        </div>
    `
}