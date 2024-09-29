# Web Project Store Car

This is a web project built with a structured architecture that separates different functionalities and resources into specific directories. The goal of this project is to maintain clean and modular code while allowing easy scalability and collaboration.

## Project Architecture

### 1. **assets/**
This directory holds all the static resources required for the project, such as stylesheets, scripts, and images.

- **css/**: Contains all the CSS files that define the styles and layout of the website. This includes general styles, themes, and any framework-specific stylesheets (e.g., Bootstrap).
  
- **js/**: Contains all the JavaScript files. This includes custom scripts that manage client-side interactions, animations, form validations, etc.
  
- **img/**: This folder holds all the images used throughout the website. This can include icons, logos, backgrounds, or product images.

### 2. **classes/**
This directory contains PHP classes that handle the core logic of the application.

- **Objects**: Each class within this folder represents an object with its own set of attributes and methods (functions). These classes are designed to interact with data, handle business logic, or provide helper methods that can be used across the project.

  - Object: `Product.php` handles product-related operations like product management, data retrieval, and updates.
  - Object: `Carrito.php` manages product attributes, pricing logic, and inventory management for the shopping cart.

### 3. **includes/**
This folder contains reusable PHP scripts that are shared across multiple pages. These scripts typically manage smaller, repetitive tasks or help modularize common elements.

- Example: `navbar.php` could hold the HTML structure for the site’s navigation, and `footer.php` would contain the footer code that is included in each page.

### 4. **views/**
This directory contains the pages viewed in the browser, built using PHP. These are the core pages of the site, each representing a specific part of the user experience.

- **paginas/**: This subfolder contains specific PHP pages that correspond to the main functionalities of the site.

  - **dashboard.php**: This is the presentation page that will display a welcome message to users who visit the website.
  
  - **agregar.php**: This page allows users to add products to the product carousel (E-commerce section). Products entered here will appear in the product carousel for users to browse.
  
  - **product.php**: This page displays the product carousel, showcasing all available products in a scrollable format for the user to view.
  
  - **storecar.php**: This page acts as the shopping cart. Users can add products here, and it will handle the calculations for price, subtotal, and total cost (shopping cart functionality).

### 5. **index.php**
The `index.php` file is the main entry point for the website. It serves as the homepage and typically includes calls to `navbar.php`, `footer.php`, and other components to construct the full page.

### 6. **Image Example**
Here is an example of how the product carousel might look like:

![Product Carousel](/assets/img/Sale.png)

This image showcases a preview of the carousel that will be featured on the `product.php` page.
## How to Contribute
### 1. **Fork the Repository**
Start by forking this repository to your GitHub account. This will create a personal copy of the project where you can make changes without affecting the original codebase.

### 2. **Clone Your Fork**
Clone your fork to your local machine to begin working on the project:
```bash
git clone https://github.com/Anell-dev/php-boostrap-shopping-cart.git
