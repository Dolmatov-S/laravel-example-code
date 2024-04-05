export const SiteTemplate = (site) => {
    return `<article  class="flex bg-white border border-gray-300 px-4 py-3 gap-x-4 rounded-xl justify-between items-center">
   <div class="inline-flex gap-3">
       <div class="w-12 h-12 border uppercase border-slate-200 flex items-center justify-center rounded">${site.name[0]}</div>
       <div>
           <p class="font-semibold">${site.name}</p>
           <p class="text-slate-500 text-xs">${site.framework ?? 'Без фреймворка'}</p>
       </div>
   </div>
    <div class="flex gap-2 items-center text-sm text-slate-500">
        <a href="${site.developer_link}" class="hover:text-blue-500">${site.developer_count} разработчик(ов)</a>
        -
        Сделали это за ${site.coast ? site.coast.toLocaleString() + ' Руб.' : 'Нет цены'}

    </div>
</article>`;
}
