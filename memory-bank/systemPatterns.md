# System patterns

- Classic PHP WordPress theme with custom page templates
- `experience` custom post type + `experience_group` taxonomy
- Theme Customizer for contact and promo
- Demo seed on `after_switch_theme`
- Enquiry form via `admin-post.php` + `wp_mail`
- Static preview generated from `scripts/build-preview.py` sharing theme CSS/JS
- Docker Compose: official `wordpress` + `mysql` images, theme bind-mounted
