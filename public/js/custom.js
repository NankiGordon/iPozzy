  function updateRemainingCharacters() {
            const textarea = document.getElementById('description');
            const remaining = 250 - textarea.value.length;
            const charCount = document.getElementById('charCount');
            charCount.textContent = remaining + ' characters remaining';
        }

        function previewImage(id) {
            const input = document.getElementById(id);
            const previewContainer = document.getElementById('image-previews');

            const file = input.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    // Create a container div for each image and the "X" button
                    const imageContainer = document.createElement('div');
                    imageContainer.style.position = 'relative';
                    imageContainer.style.display = 'inline-block';
                    imageContainer.style.margin = '5px';

                    // Create the image element
                    const imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.style.width = '100px';
                    imgElement.style.height = '100px';

                    // Create the remove button (red "X")
                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'X';
                    removeButton.style.position = 'absolute';
                    removeButton.style.top = '0';
                    removeButton.style.right = '0';
                    removeButton.style.backgroundColor = 'red';
                    removeButton.style.color = 'white';
                    removeButton.style.border = 'none';
                    removeButton.style.padding = '5px';
                    removeButton.style.cursor = 'pointer';

                    // Add an event listener to remove the image on button click
                    removeButton.addEventListener('click', function() {
                        imageContainer.remove();
                    });

                    // Append the image and the "X" button to the container
                    imageContainer.appendChild(imgElement);
                    imageContainer.appendChild(removeButton);

                    // Append the image container to the preview section
                    previewContainer.appendChild(imageContainer);
                };

                reader.readAsDataURL(file);
            }
        }
        // Function to generate image input fields
        function generateImageInputs() {
            const container = document.getElementById('property_images');
            const numberOfImages = 6; // Total number of images
            for (let i = 1; i <= numberOfImages; i++) {
                const inputDiv = document.createElement('div');
                inputDiv.classList.add('mb-3');

                const label = document.createElement('label');
                label.setAttribute('for', `image_${i}`);
                label.classList.add('form-label');
                label.textContent = `Property Image ${i}`;

                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('name', `image_${i}`);
                input.setAttribute('id', `image_${i}`);
                input.classList.add('form-control');
                input.setAttribute('onchange', `previewImage('image_${i}')`);

                inputDiv.appendChild(label);
                inputDiv.appendChild(input);
                container.appendChild(inputDiv);
            }
        }

        // Call function to generate the inputs
generateImageInputs();

 document.addEventListener('DOMContentLoaded', function () {
        var propertiesPerPage = window.innerWidth <= 576 ? 1 : 4;

        // AJAX request to update the number of properties per page dynamically
        fetch(`/?per_page=${propertiesPerPage}`)
            .then(response => response.json())
            .then(data => {
                // Render the updated properties
                // Assuming you have a mechanism to update the page with the new properties
            });
 });


