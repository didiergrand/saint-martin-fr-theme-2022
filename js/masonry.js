function resizeGridItem(item, grid){
  rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
  rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
  rowSpan = Math.ceil((item.querySelector('.content').getBoundingClientRect().height+rowGap)/(rowHeight+rowGap)+5);
  item.style.gridRowEnd = "span "+rowSpan;
}
  
function resizeAllGridItems(){
  const grid = document.querySelector(".latest-news .container-l");
  const bienvenue = document.querySelector(".bienvenue");
  grid.style.display = "grid";
  bienvenue.style.display = "block";
  allItems = grid.querySelectorAll(".post");

  for(x=0;x<allItems.length;x++){
    resizeGridItem(allItems[x], grid);
  }
}
function resizeInstance(instance){
  item = instance.elements[0];
  resizeGridItem(item);
}


window.addEventListener("load", (event) => {
  const actualites = document.getElementsByClassName("category-actualites");
  if(actualites.length > 0){
    resizeAllGridItems();
    window.addEventListener("resize", resizeAllGridItems);
  
    // for(x=0;x<allItems.length;x++){
    //   imagesLoaded( allItems[x], resizeInstance);
    // }
  }
});


