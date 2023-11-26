(function () {
   let category = document.getElementById("category");
   let categories = document.getElementById("categories");
   let categoriesHidden = document.getElementById("hidden");
   let categoriesNameArray = [];
   let categoriesNumberArray = [];
   let categoryName;
   let categoryNumber;
   category.addEventListener("change", function (event) {
      categoryName = category.options[category.selectedIndex].text;
      categoryNumber = category.value;
      if (categoryNumber != "no") {
         let index = categoriesNumberArray.findIndex(
            (value) => value === categoryNumber
         );
         if (index === -1) {
            categoriesNumberArray.push(categoryNumber);
            categoriesNameArray.push(categoryName);
         }
         else{
            categoriesNumberArray.splice(index, 1);
            categoriesNameArray.splice(index, 1);
         }
            categories.innerHTML = "";
            categoriesNameArray.forEach(categ => {
               categories.innerHTML += categ + " ";
            })
         category.selectedIndex = -1;
         categoriesHidden.value = categoriesNumberArray.join('|');

      }
   });
})();
