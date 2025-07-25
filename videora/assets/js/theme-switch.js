document.addEventListener("DOMContentLoaded", () => {
  const toggle = document.getElementById("toggle-theme");
  toggle.addEventListener("change", () => {
    const newTheme = toggle.checked ? "dark" : "light";
    document.documentElement.className = newTheme;
    document.cookie = "theme=" + newTheme + "; path=/";
  });

  // Tema cookie'sini uygula
  const cookies = document.cookie.split(';');
  cookies.forEach(c => {
    const [key, value] = c.trim().split('=');
    if (key === 'theme') {
      document.documentElement.className = value;
      toggle.checked = value === 'dark';
    }
  });
});