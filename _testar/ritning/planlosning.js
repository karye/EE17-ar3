const rect1 = document.querySelector('#rect1');
const rect2 = document.querySelector('#rect2');

/* const useEventType = (typeof window.PointerEvent === 'function') ? 'pointer' : 'mouse';
const listeners = ['click', 'touchstart', 'touchend', 'touchmove', `${useEventType}enter`, `${useEventType}leave`, `${useEventType}move`];

const pointerHandler = (event) => {
    event.preventDefault();
    const evtype = document.createTextNode(event.type + "\n");
    output.appendChild(evtype);
}

listeners.map((etype) => {
    circ.addEventListener(etype, pointerHandler);
});
 */

 rect1.addEventListener("click", test1);
 function test1() {
     rect1.classList.toggle("on");
     console.log("rect1 click");
 }
 rect2.addEventListener("click", test2);
 function test2() {
     rect2.classList.toggle("on");
     console.log("rect2 click");
 }