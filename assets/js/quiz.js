
document.addEventListener("click", init);
let meny;
function init(event) {
const valg1 = document.querySelectorAll(".mer");
const valg2 = event.target;
    if (event.target.classList.contains('mer')) {
        for (let i = 0; i < valg1.length; i++) {
            if (valg1[i].isSameNode(valg2)) {
                const $overlap = document.querySelector(`#${valg1[i].parentNode.id} .overlap`);
                $overlap.classList.toggle("hidden");
                break;
            }
        }
    } else {
        for (let i = 0; i < valg1.length; i++) {
            const $overlap = document.querySelector(`#${valg1[i].parentNode.id} .overlap`);
            $overlap.classList.add("hidden");
        }
    }
}