import {getSiblings} from "./helpers";

function tabsLogic(el) {
    let clicked = el;
    let id = clicked.dataset.tab;
    let triggerSiblings = getSiblings(clicked);
    let content = clicked.parentNode.nextElementSibling;

    if(content) {
        clicked.classList.add('is-active');
        triggerSiblings.forEach(function (sibling) {
            sibling.classList.remove('is-active');
        })

        let contentChildren = content.querySelectorAll('[data-tab]');
        contentChildren.forEach(function (child) {
            child.style.display = child.dataset.tab === id ? 'block' : 'none';
        })
    }
}



export function initTabs() {

    document.body.addEventListener('click', function (e) {
        if(e.target.closest('[data-tab]')) {tabsLogic(e.target.closest('[data-tab]'))}
    })

}
