=== Quae Map ===
Contributors: quaelibet
Tags: maps, map, google map, google maps, google maps widget, google maps plugin, geocoder, google maps api v3, geocoding
Requires at least: 3.8
Tested up to: 4.1.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Quae Map allows You to add Google Map as a sidebar widget or anywhere else on Your site (using provided shortcode).

== Description ==

With Quae Map plugin You can include Google Map on Your website as a sidebar widget. You can also use a shortcode to put Google Map anywhere else on Your website.

Both widget and shortcode are customizable. You can provide address that should be marked on map as well as Lat, Lon values (if Lat, Lon are not set, provided address is used for geocoding). You can also choose which controls should appear on Your Google Map. Plugin is based on Google Maps API v3, no iframes used. Multiple maps can be included on one page.

= Customizable elements =
* Address
* Lat, Lon
* Zoom
* Show/hide map controls: zoom, map type, scale, street view
* Bouncing/static marker
* Info window attached to marker showing provided address
* Custom info window title
* For map inserted using shortcode - height and width of map (in px or % or any other css-supported unit You like to use)

By default map (both widget and shortcode version) is coded as responsive.


== Installation ==

= Install Via Admin Area =

1. In Your admin panel go to Plugins > Add New and search for "Quae Map"
2. Click install and then click activate

= Upload Manually =

1. Download and unzip the plugin
2. Upload the 'quae_map' folder into the '/wp-content/plugins/' directory
3. In Your admin panel go to the Plugins page and activate the plugin


== Frequently Asked Questions ==

= How do I put Google map in my sidebar? =

Just go to Appearance > Widgets page in your admin panel, drag Quae Map Widget to Your sidebar area and fill in needed information. You should provide at least address or lat,lon information. If both address and lat,lon would be empty, map would be centered on 0,0 point.

= How do I put Google map anywhere else on my page? =

You should use provided `[quae_map]` shortcode. In the simplest case You should provide address or lat,lon information, i.e.:
`[quae_map address="Redmond, Washington"]`

= How can I customize my map using provided shortcode? =

Map can be customized using defined shortcode attributes:
* address
* latlon
* zoom (default: 12)
* zoom_control (default: "off")
* map_type_control (default: "on")
* scale_control (default: "on")
* street_view_control (default: "off")
* bounce (default: "off")
* info_window (default: "off")
* info_window_title
* width (default: "100%")
* height (default: "350px")

Shortcode with some attributes set would look as follows:
`[quae_map address="Redmond, Washington" latlon="47.674059, -122.130333" zoom="16" info_window="on" info_window_title="You can find me here!" zoom_control="on" bounce="on" height="400px"]`


== Screenshots ==

1. Widget options screen
2. Sidebar widget
3. Quae Map shortcode included in text editor
4. Map inclued on site (by shortcode)


== Changelog ==

= 1.0 =
* Initial launch of the plugin


== Upgrade Notice ==

= 1.0 =
This is the first version of the plugin.  No updates available yet.