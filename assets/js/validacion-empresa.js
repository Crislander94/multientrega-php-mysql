const regexp_user = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const regexp_pass = new RegExp('([a-zA-Z0-9]){5}');

function setAction(form) {
  var user = form.elements[0].value;
  var pass = form.elements[1].value;

  if (!regexp_user.test(user)) {
    document.getElementsByClassName("invalid-feedback")[0].style.display = "block";
    return false
  } else if (user.trim() !== "usuario@empresa.com") {
    document.getElementsByClassName("invalid-feedback")[0].style.display = "block";
    return false
  } else if (!regexp_pass.test(pass)) {
    document.getElementsByClassName("invalid-feedback")[0].style.display = "block";
    return false
  } else if (pass.trim() !== "empresa") {
    document.getElementsByClassName("invalid-feedback")[0].style.display = "block";
    return false
  } else {
    form.action = "./views/empresa/registrarinformacion.html"
    return true
  }
}

(function() {
  'use strict';
  window.addEventListener('load', function() {
    var items = document.getElementsByClassName('dropdown-menu');
    Array.prototype.filter.call(items, function(item) {
      item.addEventListener('click', function(event) {
        alert("Debe iniciar sesion")
      }, false);
    });
    var navbar_brands = document.getElementsByClassName('navbar-brand');
    Array.prototype.filter.call(navbar_brands, function(navbar_brand) {
      navbar_brand.addEventListener('click', function(event) {
        alert("Debe iniciar sesion")
      }, false);
    });
    var nav_links = document.getElementsByClassName('nav-link-id');
    Array.prototype.filter.call(nav_links, function(nav_link) {
      nav_link.addEventListener('click', function(event) {
        alert("Debe iniciar sesion")
      }, false);
    });
  }, false);
})();