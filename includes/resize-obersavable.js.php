<script>
    function elementResizeObserver($elementSelector) {
        if (parent && parent !== window) {

            // Select the element to observe
            const target = document.querySelector($elementSelector);

            const parentOrigin = "*" //window.parent.origin;

            const postMessageContent = {
                messageType: 'content-resize',
                moduleName: 'environmentaldashboard-ecolympics',
                targetFrame: window.location.href,
                width: 0,
                height: 0
            }
            /* send an initial message with 0 height & width */
            parent.postMessage(postMessageContent, parentOrigin)
            /* hanndle resize observable */
            // Create a new ResizeObserver instance
            const myObserver = new ResizeObserver(entries => {
                entries.forEach(entry => {
                    const {
                        width,
                        height
                    } = entry.contentRect

                    if (!isNaN(height) && width) {
                        parent.postMessage({
                            ...postMessageContent,
                            width,
                            height
                        }, parentOrigin);
                    }
                });
            });
            // Start observing the target element
            myObserver && myObserver.observe(target);
        }
    }
</script>