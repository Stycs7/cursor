# Shearwater Victoria Falls — WordPress site

A custom WordPress theme and static design preview for **Shearwater Victoria Falls**: adventure, Explorers Village, and dining on the edge of Mosi-oa-Tunya.

This is a design-ready starter you can activate on any WordPress 6.4+ install (self-hosted or local Docker). Copy, contact details, and photography are placeholders you can replace in the editor.

## What you get

- Custom theme `shearwater-vf` with Home, Experiences, Stay, Dine, About, and Contact templates
- Experience custom post type (rafting, Flight of Angels, cruises, safari, Simunye, and more)
- Enquiry form that emails `online@shearwatervf.com`
- Theme Customizer fields for phone, mobile, email, WhatsApp, and the promo bar
- Static HTML preview in `preview/` so you can review the design without WordPress

## See the design now (no WordPress required)

From the repo root:

```bash
python3 scripts/build-preview.py
python3 -m http.server 4173 --directory preview
```

Open [http://localhost:4173](http://localhost:4173). Pages: Home, Experiences, Stay, Dine, About, Contact.

## Install on WordPress

### Option A — upload the theme

1. Zip `wp-content/themes/shearwater-vf`
2. In WP Admin go to **Appearance → Themes → Add New → Upload Theme**
3. Activate **Shearwater Victoria Falls**
4. On first activation the theme creates pages, a primary menu, and sample experiences

### Option B — Docker (local)

```bash
docker compose up -d
```

Visit [http://localhost:8080](http://localhost:8080), complete the WordPress install, then activate the theme under **Appearance → Themes**.

## After activation

1. **Appearance → Customize** — update phone, email, WhatsApp, promo bar, and logo
2. **Experiences** — replace sample copy and add featured images
3. **Pages** — Home is set as the front page; other pages already use the designed templates
4. Replace Unsplash placeholders with Shearwater photography

## Design notes

- Editorial serif headlines (Fraunces) with a quiet sans (Outfit)
- Forest, mist, and gold drawn from the gorge and sunset river
- Mobile navigation, experience filters, and a sticky header
- Contact details default to the public Shearwater lines and `online@shearwatervf.com`

Photography in the preview is from Unsplash and is not Shearwater’s own media. Swap it before launch.
