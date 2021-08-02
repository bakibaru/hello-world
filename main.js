"use script";{
    const box = document.getElementById("box");
    const box2= document.getElementById("box2");
    const kuji = () => {box2.classList.add("kuji2")};
    const kiti = ["大吉", "吉","中吉", "小吉","末吉","凶","大凶"];
    box.addEventListener("click", () => {
        if(box.className === "") {
            box.classList.add("omi");
            let n = Math.floor(Math.random() * 7);
            box2.textContent = kiti[n];
        setTimeout(kuji, 5000);
        } else {
            box.classList.remove("omi");
            box2.classList.remove("kuji2");
        }
    });
}
