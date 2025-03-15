document.addEventListener("DOMContentLoaded", function() {
    fetch("http://127.0.0.1:5000/books")
        .then(response => response.json())
        .then(data => displayBooks(data));

    function displayBooks(books) {
        const container = document.getElementById("books-container");
        books.forEach(book => {
            const div = document.createElement("div");
            div.classList.add("book");
            div.innerHTML = `<h3>${book.title}</h3><p>${book.author}</p>`;
            div.addEventListener("click", () => showBookDetails(book));
            container.appendChild(div);
        });
    }

    function showBookDetails(book) {
        document.getElementById("book-title").textContent = book.title;
        document.getElementById("book-description").textContent = book.description;
        document.getElementById("book-availability").textContent = book.available ? "Dostępna" : "Niedostępna";

        document.getElementById("book-modal").style.display = "block";
    }

    document.querySelector(".close").addEventListener("click", function() {
        document.getElementById("book-modal").style.display = "none";
    });
});
