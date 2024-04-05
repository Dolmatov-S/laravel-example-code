export const DeveloperTemplate = (developer) => {
    return `<article  class="flex bg-white border border-gray-300 px-4 py-3 gap-x-4 rounded-xl justify-between items-center">
   <div class="inline-flex gap-3">
       <div class="w-12 h-12 bg-slate-200 flex items-center justify-center rounded-full">${developer.name[0]}</div>
       <div>
           <p class="font-semibold">${developer.name}</p>
           <p class="text-slate-500 text-xs">${developer.frameworks}</p>
       </div>
   </div>
    <div class="flex gap-6 items-center">
        <a href="${developer.links.site}" class="text-sm text-slate-500 hover:text-blue-500">${developer.site_count} - сайт(ов)</a>
        <span  class="py-3 px-4 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-gray-200 text-gray-500">
            ${developer.salary.toLocaleString()} Руб/Мес.
        </span>
    </div>
</article>

`;
}
