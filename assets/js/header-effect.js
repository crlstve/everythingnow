const header = document.getElementById('now-header'); document.addEventListener('scroll', function () { let scrollPos = window.pageYOffset; if (scrollPos > 70) { header.classList.add("shadow-sm", "backdrop-blur-md"); } else { header.classList.remove("shadow-sm", "backdrop-blur-md"); } });