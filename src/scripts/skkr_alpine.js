import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import DOMPurify from "dompurify";

Alpine.plugin(intersect);

window.Alpine = Alpine;

window.safeUrl = (url) => {
    if (!url) return "#";
    // Internal widget navigation ("#slide:some-slug") is handled by a
    // delegated click listener in skkr.html.
    if (url.startsWith("#slide:")) return url;
    try {
        const { protocol } = new URL(url);
        return ["https:", "http:", "tel:", "mailto:"].includes(protocol)
            ? url
            : "#";
    } catch {
        return "#";
    }
};

window.sanitizeHtml = (str) =>
    DOMPurify.sanitize(str ?? "", {
        USE_PROFILES: { html: true },
    });

window.sanitizeSvg = (str) =>
    DOMPurify.sanitize(str ?? "", {
        USE_PROFILES: { svg: true, svgFilters: true },
    });

Alpine.start();
