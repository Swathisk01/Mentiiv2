const quotes = [{
    quote: `"Please remember that you’re capable, brave and loved – even when it feels like you’re not.."`,
    //writer: `– Mae West`
}, {
    quote: `"Do not give the past the power to define your future."`,
    writer: `– Albert Einstein`
}, {
    quote: `"Just a reminder: it is NOT selfish to put your recovery first. Rather, it’s necessary in order to make sure that everything else doesn’t come last."`,
    writer: `– Babe Ruth`
}, {
    quote: `"Your time is limited, so don’t waste it living someone else’s life."`,
    writer: `– Steve Jobs`
}, {
    quote: `"In order to write about life first you must live it."`,
    writer: `– Ernest Hemingway`
}, {
    quote: `"Perhaps you’ve been assigned this mountain to show others that it can be moved."`,
    writer: `– Soren Kierkegaard`
}, {
    quote: `"On those really difficult days when it seems impossible to go on and you feel like giving up, just remind yourself that you’ve been there before and you’ve survived every time, so you can survive this time, too."`,
    writer: `– Socrates`
}, {
    quote: `"You are not worthless, you are not a failure, and you are not a loser. That voice saying you are is just your depression trying to trick you."`,
    writer: `– Oprah Winfrey`
}, {
    quote: `"The purpose of our lives is to be happy."`,
    writer: `- Dalai Lama`
}, {
    quote: `"Small, baby steps each day add up to huge, giant leaps over time. So, please keep going.  Do NOT give up."`,
    writer: `- Elton John`
}, {
    quote: `"On those really difficult days when it seems impossible to go on and you feel like giving up, just remind yourself that you’ve been there before and you’ve survived every time, so you can survive this time, too."`,
    writer: `- Elton John`
},

]





let btn = document.querySelector("#Qbtn");

let quote = document.querySelector(".quote");

//let writer = document.querySelector(".writer");






btn.addEventListener("click", function() {
    let random = Math.floor(Math.random() * quotes.length);
    
    
    quote.innerHTML = quotes[random].quote;

    
   // writer.innerHTML = quotes[random].writer;
})
