# Architronix Theme - Gulp Build System

This WordPress theme uses Gulp to compile SCSS files to CSS with automatic prefixing, sourcemaps, and RTL support.

## Installation

1. Make sure you have Node.js installed on your system
2. Navigate to the theme directory:
   ```bash
   cd wp-content/themes/architronix
   ```
3. Install dependencies:
   ```bash
   npm install
   ```

## Usage

### Available Commands

- `npm run build` - Clean and build all CSS files
- `npm run watch` - Build and watch for changes (recommended for development)
- `npm run compile` - Compile only the main style.scss file
- `gulp` - Same as watch (default task)

### Individual Tasks

- `gulp sass` - Compile main style.scss
- `gulp theme` - Compile theme.scss
- `gulp admin` - Compile admin SCSS files
- `gulp rtl` - Generate RTL version of style.css
- `gulp clean` - Remove compiled CSS files

## File Structure

- **Source**: `assets/scss/`

  - `style.scss` - Main stylesheet (compiles to `assets/css/style.css`)
  - `theme.scss` - Theme-specific styles (compiles to `assets/css/theme.css`)
  - `_*.scss` - Partial files imported by main stylesheets

- **Output**: `assets/css/`
  - `style.css` - Main compiled stylesheet
  - `style.css.map` - Sourcemap for debugging
  - `style.rtl.css` - RTL version for right-to-left languages
  - `theme.css` - Compiled theme styles

## Features

- **SCSS Compilation**: Converts SCSS to CSS
- **Autoprefixer**: Automatically adds vendor prefixes
- **Sourcemaps**: For easier debugging in browser dev tools
- **RTL Support**: Automatically generates right-to-left CSS
- **File Watching**: Automatically recompiles when files change
- **Clean Task**: Removes old compiled files before building

## Development Workflow

1. Run `npm run watch` to start the development server
2. Edit SCSS files in `assets/scss/`
3. Files will automatically compile when saved
4. Check the browser - changes should be reflected immediately

## Troubleshooting

- If compilation fails, check the console for SCSS syntax errors
- Make sure all imported files exist and paths are correct
- Run `gulp clean` and then `gulp build` if you encounter caching issues
