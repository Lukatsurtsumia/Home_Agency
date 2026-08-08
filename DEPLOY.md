# Deploying Home_Agency to gagoagency.boxeros.com (Coolify)

Production runs from the **Dockerfile** in this repo (nginx + php-fpm, port **8080**).
Local development still uses Laravel Sail (`compose.yaml`) — unaffected.

## 1. Push the code to GitHub
Coolify deploys from GitHub, so the repo must be up to date:
```bash
git push origin main
```

## 2. DNS
Point an **A record** for `gagoagency.boxeros.com` to your Coolify server's IP
(the same server as your other boxeros sites).

## 3. Create the resource in Coolify
1. **+ New → Application → Public/Private Repository** → select `Lukatsurtsumia/Home_Agency`, branch `main`.
2. **Build Pack: Dockerfile** (Coolify auto-detects the `Dockerfile`).
3. **Ports exposed:** `8080`.
4. **Domain:** `https://gagoagency.boxeros.com` (Coolify provisions HTTPS via Let's Encrypt).

## 4. Add a MySQL database (Coolify → + New → Database → MySQL)
Note its host, database, user, password — you'll use them in the env below.

## 5. Environment variables (Coolify → the app → Environment Variables)
```
APP_NAME=GaGoAgency
APP_ENV=production
APP_DEBUG=false
APP_URL=https://gagoagency.boxeros.com
ASSET_URL=https://gagoagency.boxeros.com   # must match APP_URL -- see note below
APP_KEY=            # generate: `php artisan key:generate --show` and paste (base64:...)
APP_LOCALE=ka
APP_FALLBACK_LOCALE=ka

DB_CONNECTION=mysql
DB_HOST=<mysql-host-from-coolify>
DB_PORT=3306
DB_DATABASE=<db-name>
DB_USERNAME=<db-user>
DB_PASSWORD=<db-pass>

SESSION_DRIVER=database
CACHE_STORE=database        # persists the cached NBG currency rate

# Contact-form email (use your Resend/SMTP creds, like your other sites)
MAIL_MAILER=smtp
MAIL_HOST=<smtp-host>
MAIL_PORT=587
MAIL_USERNAME=<smtp-user>
MAIL_PASSWORD=<smtp-pass>
MAIL_FROM_ADDRESS=GaGoAgency0@gmail.com
MAIL_FROM_NAME="GaGo Agency"
```

## 6. Deploy
Click **Deploy**. On start, the container automatically runs migrations and caches config
(`AUTORUN_ENABLED=true` in the Dockerfile).

## 7. One-time after first deploy
In Coolify's terminal for the container (or a post-deploy command), run once:
```bash
php artisan storage:link      # so uploaded portfolio images are served
```
> Uploaded images live in `storage/app/public`. For them to survive redeploys,
> add a **persistent volume** in Coolify mapping `/var/www/html/storage/app/public`.

## Notes
- **Georgian is the default language**; visitors switch to English via the GEO/ENG toggle.
- The MapTiler key for the map is currently hard-coded in the calculator JS — fine for now,
  but consider moving it to an env var later.
- Health check: the app responds at `/up` (Laravel health route) and `/`.
- **`ASSET_URL` is required**, not optional. The container sits behind Cloudflare +
  Coolify's proxy and only ever sees plain HTTP internally, so without it, `@vite()`'s
  CSS/JS links render as `http://` and get blocked as mixed content on the `https://`
  page (broken styling/JS). Setting `ASSET_URL` equal to `APP_URL` forces Vite's asset
  URLs to the correct scheme+host regardless of proxy header detection.
