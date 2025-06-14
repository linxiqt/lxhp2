// Generated by dts-bundle v0.7.3-fork.1
// Dependencies for this module:
//   ../../../../../@fullcalendar/core
declare module '@fullcalendar/list' {
    import ListView from '@fullcalendar/list/ListView';
    export { ListView };
    const _default: import("@fullcalendar/core").PluginDef;
    export default _default;
}
declare module '@fullcalendar/list/ListView' {
    import { View, ViewProps, ScrollComponent, DateMarker, DateRange, DateProfileGenerator, ComponentContext, ViewSpec, EventUiHash, EventRenderRange, EventStore, Seg } from '@fullcalendar/core';
    export { ListView as default, ListView };
    class ListView extends View {
        scroller: ScrollComponent;
        contentEl: HTMLElement;
        dayDates: DateMarker[];
        constructor(context: ComponentContext, viewSpec: ViewSpec, dateProfileGenerator: DateProfileGenerator, parentEl: HTMLElement);
        render(props: ViewProps): void;
        destroy(): void;
        updateSize(isResize: any, viewHeight: any, isAuto: any): void;
        computeScrollerHeight(viewHeight: any): number;
        _eventStoreToSegs(eventStore: EventStore, eventUiBases: EventUiHash, dayRanges: DateRange[]): Seg[];
        eventRangesToSegs(eventRanges: EventRenderRange[], dayRanges: DateRange[]): any[];
        eventRangeToSegs(eventRange: EventRenderRange, dayRanges: DateRange[]): any[];
        renderEmptyMessage(): void;
        renderSegList(allSegs: any): void;
        groupSegsByDay(segs: any): any[];
        buildDayHeaderRow(dayDate: any): HTMLTableRowElement;
    }
}
