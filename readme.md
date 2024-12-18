# Custom Template

This project includes a custom template for WordPress with a structured approach to handling custom post types, custom taxonomies, custom widgets, meta boxes, and various front-end functionalities.

## Folder Structure

- **assets**: Contains all the assets (images, styles, scripts) used in the theme.
- **inc**: Includes various files for modular code.
  - **custom-post-types**: All custom post type registrations.
  - **custom-taxonomies**: All custom taxonomy registrations.
  - **custom-widget**: All widget registrations.
  - **customizes**: All customizations related to content/UI.
  - **hooks**: All hook functions.
  - **meta-boxes**: All meta box registrations.
- **front-page.php**: Custom home page template.
- **functions.php**: Contains all the functions, hooks, and asset inclusions for the theme.
- **header.php**: Custom header menu.
- **page-campgrounds.php**: Custom page for viewing campgrounds.
- **page-weather-table.php**: Custom page for the weather table widget, handling search with AJAX, and fetching data from the OpenWeather API.
- **template-custom.php**: Custom blank page template.

## Tasks Completed

### 1. **Create a custom post type called “Cities.”**
   - A custom post type "Cities" has been created. Two types of cities have been added:
     - One using a custom taxonomy "Countries."
     - The other storing country information using custom meta boxes.

### 2. **On the post editing page, create a meta box with custom fields “latitude” and “longitude.”**
   - Meta boxes have been created in the `inc/meta-boxes` folder to allow users to enter latitude and longitude for each city.

### 3. **Create a custom taxonomy titled “Countries” and attach it to “Cities.”**
   - The "Countries" taxonomy has been created and attached to the "Cities" custom post type. It is located in the `inc/custom-taxonomies` folder.

### 4. **Create a widget where a city from the custom post type “Cities” is displayed. The widget shows the city name and the current temperature using an external API (e.g., OpenWeatherMap).**
   - A custom widget has been created in the `inc/custom-widget` folder, which displays the city's name and current temperature by fetching data from the OpenWeatherMap API. This widget is used on the "Weather Table" page (`page-weather-table.php`).

### 5. **On a separate page with a custom template, display a table listing countries, cities, and temperatures.**
   - A table listing countries, cities, and temperatures is displayed on the "Weather Table" page (`page-weather-table.php`).
   - The table data is fetched using a database query with the `$wpdb` global variable.
   - A search field is added above the table using WP Ajax for dynamic city search functionality.
   - Custom action hooks are added before and after the table for further customization.

## Usage

To use this template:

1. Ensure the theme is installed and activated on your WordPress website.
2. You can access the custom post type "Cities" in the WordPress dashboard to create and manage city entries.
3. The "Countries" taxonomy allows you to group cities by their respective countries.
4. The custom widget can be added to any widgetized area to display a city's weather information.
5. The "Weather Table" page template will display a dynamic table of cities, countries, and their weather information with an AJAX-powered search.

## Notes

- Make sure the **OpenWeatherMap API key** is correctly set in the widget for fetching weather data.
- The weather data is updated based on the city’s latitude and longitude stored in the post’s meta fields.

## Contact

- Muhammad Nur Alif (al.developer12@gmail.com - mna.official12@gmail.com)
