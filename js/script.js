function homePageAnimation(){
  gsap.set(".slidesm", {scale: 5})

var tl = gsap. timeline({
scrollTrigger: {
trigger: ".home",
start: "top top",
end: "bottom bottom",
scrub: 1
}
})

tl
.to(".vdodiv", {
'--clip': "0%",
ease: Power2
}, 'a')

.to(".slidesm", {
  scale: 1,
  ease: Power2
  }, 'a')

.to(".lft", {
xPercent: -10,
stagger: .03,
ease: Power4
}, 'b')

.to(".rgt", {
xPercent: 10,
stagger: .03,
ease: Power4
}, 'b')
}

function realAnimation(){
  gsap.to(".slide",{
      scrollTrigger: {
          trigger: ".real",
          start: "top top",
          end: "bottom bottom",
          scrub: 1
      },
      xPercent: -200,
      ease: Power4
  })
}

function teamAnimation()
{
  document.querySelectorAll(".listelem")
.forEach(function(el){
  el.addEventListener("mousemove", function(dets){
      
     gsap.to(this.querySelector(".picture"), 
     {
      opacity: 1,
      x: gsap.utils.mapRange(0, window.innerWidth,-200,200, dets.clientX),
      ease: Power4, 
      duration: .5
     })
  })
  el.addEventListener("mouseleave", function(dets){
      gsap.to(this.querySelector(".picture"), 
      {
      opacity: 0 ,
      ease: Power4,
      duration: .5
      })
  })


})
}

function backgroundcolor()
{
  
document.querySelectorAll(".section")
.forEach(function(e) {
ScrollTrigger.create({
trigger: e,
start: "top 50%",
end: "bottom 50%",
onEnter: function () {
  document.body.setAttribute("theme", e.dataset.color);
},
onEnterBack: function () {
  document.body.setAttribute("theme", e.dataset.color);
}
})
})

}



(function () {
  const locomotiveScroll = new LocomotiveScroll();
})();

homePageAnimation();
realAnimation();
teamAnimation();
backgroundcolor();





const quotes = [{
    quote: `"You only live once, but if you do it right, once is enough."`,
    writer: `– Mae West`
}, {
    quote: `"If you want to live a happy life, tie it to a goal, not to people or things."`,
    writer: `– Albert Einstein`
}, {
    quote: `"Never let the fear of striking out keep you from playing the game."`,
    writer: `– Babe Ruth`
}, {
    quote: `"Your time is limited, so don’t waste it living someone else’s life."`,
    writer: `– Steve Jobs`
}, {
    quote: `"In order to write about life first you must live it."`,
    writer: `– Ernest Hemingway`
}, {
    quote: `"Life is not a problem to be solved, but a reality to be experienced."`,
    writer: `– Soren Kierkegaard`
}, {
    quote: `"The unexamined life is not worth living."`,
    writer: `– Socrates`
}, {
    quote: `"Turn your wounds into wisdom."`,
    writer: `– Oprah Winfrey`
}, {
    quote: `"The purpose of our lives is to be happy."`,
    writer: `- Dalai Lama`
}, {
    quote: `"Live for each second without hesitation."`,
    writer: `- Elton John`
}, ]





let btn = document.querySelector("#Qbtn");

let quote = document.querySelector(".quote");

let writer = document.querySelector(".writer");






btn.addEventListener("click", function() {
    let random = Math.floor(Math.random() * quotes.length);
    
    
    quote.innerHTML = quotes[random].quote;

    
    writer.innerHTML = quotes[random].writer;
})
