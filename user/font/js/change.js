
( function changeLanguage(lang) {
    // Logic to change the language of the website
    if (lang === 'vn') {
      document.body.innerHTML = document.body.innerHTML.replace(/English/g, 'Tiếng Anh').replace(/VietNamese/g, 'Tiếng Việt');
    } else {
      document.body.innerHTML = document.body.innerHTML.replace(/Tiếng Anh/g, 'English').replace(/Tiếng Việt/g, 'VietNamese');
    }
    console.log("Language changed to: " + lang);
  })
