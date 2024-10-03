import {slideDown, slideUp} from "./helpers";

const overlayEl = document.querySelector('[data-el="overlay"]');
const navTrigger = document.querySelector('[data-trigger="menu"]');
const navEl = document.querySelector('nav.mobile-menu');
const searchTrigger = document.querySelector('[data-trigger="search"]');
const searchEl = document.querySelector('[data-el="search"]');

function menuOpen() {
  searchClose();
  overlayEl.classList.add('is-visible');
  navTrigger.classList.add('is-clicked');
  navEl.classList.add('is-visible');
}

function menuClose() {
  overlayEl.classList.remove('is-visible');
  navTrigger.classList.remove('is-clicked');
  navEl.classList.remove('is-visible');
}

function menuLogic() {
  navTrigger.classList.contains('is-clicked') ? menuClose() : menuOpen();
}

function searchOpen() {
  menuClose();
  console.log(overlayEl);
  overlayEl.classList.add('is-visible');
  searchTrigger.classList.add('is-clicked');
  searchEl.style.display = 'block';
  searchEl.querySelector('input').focus();
}

function searchClose() {
  overlayEl.classList.remove('is-visible');
  searchTrigger.classList.remove('is-clicked');
  searchEl.style.display = 'none';
}

function searchLogic() {
  searchTrigger.classList.contains('is-clicked') ? searchClose() : searchOpen();
}

function closeHeader() {
  menuClose();
  searchClose();
}

function themeLogicOnLoad() {
  let currentScheme = localStorage.getItem('scheme');
  let currentHours = (new Date()).getHours();
  let itsDay = currentHours >= 7 && currentHours < 20;
  let newScheme = !currentScheme ? 'dark' : currentScheme;

  localStorage.setItem('scheme', newScheme);
  document.body.setAttribute('data-scheme', newScheme);

  if(newScheme === 'light') {
    document.body.classList.remove('cc--darkmode');
  } else {
    document.body.classList.add('cc--darkmode');
  }
}

function themeLogic() {
  let currentScheme = localStorage.getItem('scheme');
  let newScheme = currentScheme === 'light' ? 'dark' : 'light';

  localStorage.setItem('scheme', newScheme);
  document.body.setAttribute('data-scheme', newScheme);

  if(newScheme === 'light') {
    document.body.classList.remove('cc--darkmode');
  } else {
    document.body.classList.add('cc--darkmode');
  }
}

function fontIncrease() {
  let currentValue = getComputedStyle(document.documentElement).getPropertyValue('--font-size');
  currentValue = parseInt(currentValue, 10);
  let newValue = currentValue >= 20 ? 20 : ++currentValue;
  localStorage.setItem('fontSize', newValue);
  document.documentElement.style.setProperty('--font-size', newValue + 'px');
}

function fontDecrease() {
  let currentValue = getComputedStyle(document.documentElement).getPropertyValue('--font-size');
  currentValue = parseInt(currentValue, 10);
  let newValue = currentValue <= 14 ? 14 : --currentValue;
  localStorage.setItem('fontSize', newValue);
  document.documentElement.style.setProperty('--font-size', newValue + 'px');
}

function fontReset() {
  localStorage.setItem('fontSize', 16);
  document.documentElement.style.setProperty('--font-size', '16px');
}

function fontSizeOnLoad() {
  let fontSize = localStorage.getItem('fontSize');
  if(fontSize) document.documentElement.style.setProperty('--font-size', fontSize + 'px');
}

function initTriggers() {

  themeLogicOnLoad();
  fontSizeOnLoad();

  document.addEventListener('click', function (e) {

    if(e.target.closest('[data-trigger="search"]')) {searchLogic()}
    if(e.target.closest('[data-trigger="theme"]')) {themeLogic()}
    if(e.target.closest('[data-trigger="menu"]')) {menuLogic()}
    if(e.target.closest('[data-trigger="close"]')) {closeHeader()}
    if(e.target.closest('[data-trigger="inc"]')) {fontIncrease()}
    if(e.target.closest('[data-trigger="dec"]')) {fontDecrease()}
    if(e.target.closest('[data-trigger="reset"]')) {fontReset()}
  })
}

export function initHeader() {

  initTriggers();

}
