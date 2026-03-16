import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import DOMPurify from "dompurify";

Alpine.plugin(intersect);

window.Alpine = Alpine;

window.safeUrl = (url) => {
    if (!url) return "#";
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
