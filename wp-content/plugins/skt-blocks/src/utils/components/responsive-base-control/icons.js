/**
 * WordPress dependencies
 */
import { SVG, Path } from "@wordpress/components";

/**
 * Custom icons
 */
const icons = {};

icons.tablet = (
  <SVG
    className="dashicon"
    height="16"
    viewBox="0 0 16 16"
    width="16"
    xmlns="http://www.w3.org/2000/svg"
  >
    <Path
      d="m11.25 0h-9c-.825 0-1.5.61363636-1.5 1.36363636v13.27272724c0 .75.675 1.3636364 1.5 1.3636364h9c.825 0 1.5-.6136364 1.5-1.3636364v-13.27272724c0-.75-.675-1.36363636-1.5-1.36363636zm-.5 14h-8v-12h8z"
      transform="translate(1.25)"
    />
  </SVG>
);

icons.mobile = (
  <SVG
    className="dashicon"
    height="16"
    viewBox="0 0 16 16"
    width="16"
    xmlns="http://www.w3.org/2000/svg"
  >
    <Path
      d="m6.5 0h-5c-.825 0-1.5.61363636-1.5 1.36363636v9.27272724c0 .75.675 1.3636364 1.5 1.3636364h5c.825 0 1.5-.6136364 1.5-1.3636364v-9.27272724c0-.75-.675-1.36363636-1.5-1.36363636zm-.5 10h-4v-8h4z"
      transform="translate(4 2)"
    />
  </SVG>
);

icons.desktopChrome = (
  <SVG
    className="dashicon"
    height="16"
    viewBox="0 0 16 16"
    width="16"
    xmlns="http://www.w3.org/2000/svg"
  >
    <Path
      d="m12.5 0c.8325 0 1.5.61363636 1.5 1.36363636v11.27272724c0 .75-.675 1.3636364-1.5 1.3636364l-.5-2v-9h-10v9h10l.5 2h-11c-.8325 0-1.5-.6136364-1.5-1.3636364v-11.27272724c0-.75.6675-1.36363636 1.5-1.36363636zm-10 1c-.27614237 0-.5.22385763-.5.5s.22385763.5.5.5.5-.22385763.5-.5-.22385763-.5-.5-.5z"
      transform="translate(1 1.001872)"
    />
  </SVG>
);

icons.sync = (
  <SVG
    height="24"
    viewBox="0 0 24 24"
    width="24"
    xmlns="http://www.w3.org/2000/svg"
  >
    <Path
      d="m7.34133533 6.23855964v-1.98499625c-2.17404351.03150788-4.03300825 1.38634659-4.85221305 3.27681921-.31507877.72468117-.44111028 1.51237809-.4096024 2.33158289.06301575 1.13428361.47261815 2.20555141 1.16579145 3.05626411.37809452.4411102.28357089 1.1027757-.18904726 1.4493623-.44111028.3150788-1.07126782.2205551-1.41785447-.1890473-.85071268-1.0397599-1.38634658-2.3315829-1.54388597-3.7179294-.12603151-1.00825211-.03150788-2.01650417.25206302-2.9302326.88222055-3.02475619 3.6864216-5.26181546 6.99474868-5.29332334v-1.98499624c0-.09452363.12603151-.15753939.22055514-.09452363l4.09602403 2.99324831c.0630157.06301575.0630157.15753938 0 .18904726l-4.09602403 2.99324831c-.09452363.06301575-.22055514 0-.22055514-.09452363zm.22055514 13.17029256c.09452363.0630158.22055514 0 .22055514-.0945236v-1.9849963c3.30832709-.0315078 6.11252809-2.2685671 6.99474869-5.2933233.252063-.9137284.3780945-1.8904726.252063-2.93023256-.1575394-1.38634658-.7246812-2.67816954-1.543886-3.71792948-.3465866-.44111028-.9767441-.53563391-1.4178544-.18904726-.4726182.34658665-.5671418 1.00825206-.1890473 1.44936234.6931733.85071268 1.1027757 1.89047262 1.1657915 3.05626407.0315078.81920479-.1260315 1.63840959-.4096024 2.33158289-.787697 1.8904726-2.6466617 3.2453113-4.85221309 3.2768192v-1.9849962c0-.0945237-.12603151-.1575394-.22055514-.0945237l-4.096024 2.9932483c-.06301576.0630158-.06301576.1575394 0 .1890473z"
      transform="translate(4 2)"
    />
  </SVG>
);

export default icons;
