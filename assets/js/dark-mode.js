function toggleDarkMode(){
    const html = document.documentElement; // Selecciona la etiqueta <html>
    html.classList.toggle('dark');
    html.classList.toggle('light');
}