export function addClass(elem, ...classes) {
    elem.classList.add(...classes);
}

export function removeClass(elems, ...classes) {
    elems.classList.remove(...classes);
}

export function addClasses(elems, ...classes) {
    for (let elem of elems) {
        elem.classList.add(...classes);
    }
}

export function removeClasses(elems, ...classes) {
    for (let elem of elems) {
        elem.classList.remove(...classes);
    }
}

export function slideUp(el, duration= 500) {
    el.style.transitionProperty = 'height, margin, padding';
    el.style.transitionDuration = duration + 'ms';
    el.style.boxSizing = 'border-box';
    el.style.height = el.offsetHeight + 'px';
    el.offsetHeight;
    el.style.overflow = 'hidden';
    el.style.height = 0;
    el.style.paddingTop = 0;
    el.style.paddingBottom = 0;
    el.style.marginTop = 0;
    el.style.marginBottom = 0;
    window.setTimeout( () => {
        el.style.display = 'none';
        el.style.removeProperty('height');
        el.style.removeProperty('padding-top');
        el.style.removeProperty('padding-bottom');
        el.style.removeProperty('margin-top');
        el.style.removeProperty('margin-bottom');
        el.style.removeProperty('overflow');
        el.style.removeProperty('transition-duration');
        el.style.removeProperty('transition-property');
    }, duration);
}

export function slideDown(el, disp= 'block', duration= 200) {
    el.style.removeProperty('display');
    let display = window.getComputedStyle(el).display;
    if (display === 'none') display = disp;
    el.style.display = display;
    let height = el.offsetHeight;
    el.style.overflow = 'hidden';
    el.style.height = 0;
    el.style.paddingTop = 0;
    el.style.paddingBottom = 0;
    el.style.marginTop = 0;
    el.style.marginBottom = 0;
    el.offsetHeight;
    el.style.boxSizing = 'border-box';
    el.style.transitionProperty = 'height, margin, padding';
    el.style.transitionDuration = duration + 'ms';
    el.style.height = height + 'px';
    el.style.removeProperty('padding-top');
    el.style.removeProperty('padding-bottom');
    el.style.removeProperty('margin-top');
    el.style.removeProperty('margin-bottom');
    window.setTimeout( () => {
        el.style.removeProperty('height');
        el.style.removeProperty('overflow');
        el.style.removeProperty('transition-duration');
        el.style.removeProperty('transition-property');
    }, duration);
}

export function slideToggle(el, duration = 500) {
    if (window.getComputedStyle(el).display === 'none') {
        return slideDown(el, duration);
    } else {
        return slideUp(el, duration);
    }
}

export function fadeIn(el, display) {
    if(el) {
        el.style.opacity = 0;
        el.style.display = display || 'block';
        (function fade() {
            var val = parseFloat(el.style.opacity);
            if (!((val += .1) > 1)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }
}

export function fadeOut(el) {
    if(el) {
        el.style.opacity = 1;
        (function fade() {
            if ((el.style.opacity -= .1) < 0) {
                el.style.display = 'none';
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }
}

export function fadeToggle(el) {
    if(el) {
        if (window.getComputedStyle(el).display === 'none') {
            return fadeIn(el);
        } else {
            return fadeOut(el);
        }
    }
}

export function animateValue(obj, start, end, duration) {
    if (obj) {
        var textStarting = obj.dataset.audienceProgress;
        end = end || parseInt(textStarting.replace(/\D/g, ""));
        var range = end - start;
        var minTimer = 50;
        var stepTime = Math.abs(Math.floor(duration / range));
        stepTime = Math.max(stepTime, minTimer);
        var startTime = new Date().getTime();
        var endTime = startTime + duration;
        var timer;

        timer = setInterval(function(){
            var now = new Date().getTime();
            var remaining = Math.max((endTime - now) / duration, 0);
            var value = Math.round(end - (remaining * range));

            obj.innerHTML = textStarting.replace(/([0-9+]+)/g, value);

            if (value === end) {
                obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
                clearInterval(timer);
            }
        }, stepTime);
    }
}

// Get siblings
export function getSiblings(elem) {
    var siblings = [];
    var sibling = elem.parentNode.firstChild;
    while (sibling) {
        if (sibling.nodeType === 1 && sibling !== elem) {
            siblings.push(sibling);
        }
        sibling = sibling.nextSibling
    }
    return siblings;
}

// Debounce events
export function debounce(fn) {
  var timeout;
  return function () {
    var context = this;
    var args = arguments;
    if (timeout) {window.cancelAnimationFrame(timeout)}
    timeout = window.requestAnimationFrame(function () {
      fn.apply(this, args);
    });
  }
}
