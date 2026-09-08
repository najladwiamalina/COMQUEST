function filterObject(category) {
  let cards = document.querySelectorAll(".matkul");

  cards.forEach((card) => {
    let target = card.parentElement && card.parentElement.tagName === 'A' ? card.parentElement : card;
    if (category === "all" || card.classList.contains(category)) {
      target.style.display = card.parentElement && card.parentElement.tagName === 'A' ? "flex" : "flex";
      card.style.display = "flex";
    } else {
      target.style.display = "none";
    }
  });
}
