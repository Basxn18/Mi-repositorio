let app = document.getElementById('typewriter');
 
let typewriter = new Typewriter(app, {
  loop: true,
  delay: 75,
});
 
typewriter
  .pauseFor(2500)
  .typeString('La Ciudad Sorpresa')
  .pauseFor(100)
  .deleteChars(10)
  .start();