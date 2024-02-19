import html2canvas from "html2canvas";

document.addEventListener("livewire:navigated", () => {
    html2canvas(document.getElementById("base-canvas-post")).then(function (
        canvas
    ) {
        document.getElementById("base-post").appendChild(canvas);
    });
    html2canvas(document.getElementById("base-canvas-story")).then(function (
        canvas
    ) {
        document.getElementById("base-story").appendChild(canvas);
    });
});
