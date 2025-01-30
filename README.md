# Kampanya Servisi - Laravel v11.40.0

Bu proje, kampanyaları yönetmek için geliştirilmiş bir **Laravel v11.40.0** API servisidir. Kampanyaların oluşturulması, düzenlenmesi ve siparişlerle uyumluluğunun kontrol edilmesini sağlar.

***

## Proje Özeti

* **Framework:**
  Laravel v11.40.0
* **Kimlik Doğrulama:**
  Laravel Sanctum
* **Validasyon:**
  Request sınıfları (App\Http\Requests)
* **İş süreçleri:**
  Servis katmanı (App\Services)
* **DTO Kullanımı:**
  App\DTOs
* **Harici Kütüphane:**
  Yok
* **Postman Koleksiyonu:**

  `ideaSoft Case Campaign.postman_collection.json`

**Not:**
Bu servis, **önceki e-ticaret API’si ile aynı veritabanını kullanmaktadır**. Önce diğer projenin migrationları çalıştırılmalıdır.
İhtiyaç halinde kampanyalar için ayrı bir veritabanı ile bağımsız bir servis olarak da çalıştırılabilir.

***

## Kullanım

1. **Postman Koleksiyonu Ayarları**
    * `ideaSoft Case Campaign.postman_collection.json`
      dosyasını Postman'e aktarın.
    * Koleksiyon değişkenlerinden
      `BASE_URL`
      değerini API sunucunuzun URL’si ile değiştirin.
2. **Kimlik Doğrulama**

   Kampanya API’si için
   **Bearer Token**
   , diğer e-ticaret API’sindeki giriş işlemi sonucunda alınan token ile sağlanmalıdır.

***

## Kampanya İşlemleri

**Kampanyalar için CRUD İşlemleri:**

* **Create (Oluşturma)**
* **Read (Okuma)**
* **Delete (Silme)**

Her kampanya için:

* **Başlangıç & Bitiş Tarihi**
* **İndirim Miktarı & Oranı**
* **Kampanya Tipi**
* **Kampanya Kuralları**

belirlenir.

 **Kampanya Tipi** → Kampanyanın nasıl çalışacağını belirler ve **indirim miktarını hesaplar**.

 **Kampanya Kuralları** → `scope`, `attribute`, `operator`, `value` alanları ile belirlenir.

Örnek:
Kocaeli'deki müşteriler için 1000 TL üzeri siparişlerde %10 indirim

* **Kural 1:**

  `scope=customer`
  ,
  `attribute=city`
  ,
  `operator=="=="`
  ,
  `value="kocaeli"`
* **Kural 2:**

  `scope=order`
  ,
  `attribute=total`
  ,
  `operator=">="`
  ,
  `value=1000`

📍 **İlgili sınıflar:**

* Kampanya yönetimi →
  `App\Services\Campaign\CampaignFactory`
* Kampanya kural işlemleri →
  `App\Services\CampaignRule\CampaignRuleFactory`

***

## Kampanya - Sipariş Uyumluluğu

Kampanya hesaplamaları için:

**Endpoint:**
`GET {{BASE_URL}}/campaigns/getActiveCampaignsByOrder/{{order_id}}`
İlgili sipariş için **uygun kampanyalar hesaplanır**.

***

⚠ **Not:**
Bu proje için **yaklaşım şekli daha önemli olduğundan**, kuralların mutlak doğrulukta çalıştığını kontrol edilmedi.

Daha fazla detay için proje kodlarını inceleyebilirsiniz.





---
---
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
