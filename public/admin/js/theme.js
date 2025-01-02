(function() {
      var currentTheme = localStorage.getItem('theme');
      if (currentTheme) {
          document.documentElement.setAttribute('data-theme', currentTheme);
      }

      if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
  })();