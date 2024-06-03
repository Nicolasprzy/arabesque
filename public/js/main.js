const sections = document.querySelectorAll('section, header')
    
window.addEventListener('scroll', function() {
    sections.forEach(section => {
        const distFromTop = document.body.scrollTop + section.getBoundingClientRect().top
        if (distFromTop < 300) {
            document.body.style.background = section.dataset.color
        }
    })
})

const slider = document.querySelector('.slider');

function activate(e) {
  const items = document.querySelectorAll('.item');
  e.target.matches('.next') && slider.append(items[0])
  e.target.matches('.prev') && slider.prepend(items[items.length-1]);
}

document.addEventListener('click',activate,false);