const categorySelect = document.getElementById("categoriaId");

categorySelect.addEventListener("change", function () {
    const formData = new FormData();

    formData.append("categoriaId", this.value);

    const fetchOptions = {
        method: 'POST',
        body: formData
    };

    fetch("getSubCategorias.php", fetchOptions)
        .then((response) => response.json()) // Parse the response as JSON
        .then((data) => {
            const subcategorySelect = document.getElementById("subcategoria");

            subcategorySelect.innerHTML = "";

            data.forEach(subcategory => {
                // Create a new option element
                const option = document.createElement('option');

                option.value = subcategory.id;
                option.text = subcategory.nombre;

                subcategorySelect.appendChild(option);
            });
        })
        .catch((error) => {
            // Log any errors
            console.error(error);
        });
});