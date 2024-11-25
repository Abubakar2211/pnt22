


        <!-- Include necessary JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

        <script>
            $(document).ready(function() {
                // Initialize DataTable
                $('#contactsTable').DataTable();
            });

            // Function to handle showing details modal
            function showDetailsModal(contactId) {
                // AJAX request to fetch contact details
                $.ajax({
                    url: 'fetch_contact.php',
                    type: 'post',
                    data: { id: contactId },
                    success: function(response) {
                        $('#contactDetails').html(response);
                        $('#detailsModal').modal('show');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error('Error fetching contact details:', thrownError);
                    }
                });
            }

            // Function to handle contact deletion
            function deleteContact(contactId) {
                // Assuming you have a separate delete script
                if (confirm('Are you sure you want to delete this contact?')) {
                    window.location.href = 'delete.php?id=' + contactId;
                }
            }
        </script>

        <script>
            $(document).ready(function() {
                // Fetch country data from REST Countries API
                $.ajax({
                    url: 'https://restcountries.com/v3.1/all',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the country dropdown with fetched data
                        data.forEach(function(country) {
                            $('#country').append(`<option value="${country.name.common}">${country.name.common}</option>`);
                        });
                    },
                    error: function() {
                        console.log('Error fetching country data');
                    }
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const items = [
                    'Admin', 'Contacts', 'Emails Marketing', 'SEO', 'Social Media', 'Sales', 'Projects', 'Accounts', 'HR', 'Trainings'
                ];
                const maxVisibleItems = 7;
                const navbar = document.getElementById('navbar-items');
                const horizontalDiv = document.createElement('div');
                horizontalDiv.classList.add('horizontal-div');
                document.body.appendChild(horizontalDiv); // Append the div to the body

                items.slice(0, maxVisibleItems).forEach(item => {
                    navbar.appendChild(createNavItem(item));
                });

                if (items.length > maxVisibleItems) {
                    const dropdown = createDropdown(items.slice(maxVisibleItems));
                    navbar.appendChild(dropdown);
                }

                function createNavItem(item) {
                    const li = document.createElement('li');
                    li.className = 'nav-item';
                    const a = document.createElement('a');
                    a.className = 'nav-link';
                    a.href = '#';
                    a.textContent = item;
                    a.addEventListener('click', function (event) {
                        event.preventDefault(); // Prevent default link behavior
                        showHorizontalDiv(item, this);
                        setActiveNavItem(this);
                    });
                    li.appendChild(a);
                    return li;
                }

                function createDropdown(extraItems) {
                    const li = document.createElement('li');
                    li.className = 'nav-item dropdown';

                    const a = document.createElement('a');
                    a.className = 'nav-link dropdown-toggle';
                    a.href = '#';
                    a.id = 'navbarDropdown';
                    a.role = 'button';
                    a.dataset.toggle = 'dropdown';
                    a.setAttribute('aria-haspopup', 'true');
                    a.setAttribute('aria-expanded', 'false');
                    a.textContent = '+';

                    const div = document.createElement('div');
                    div.className = 'dropdown-menu';
                    div.setAttribute('aria-labelledby', 'navbarDropdown');

                    extraItems.forEach(item => {
                        const dropdownItem = document.createElement('a');
                        dropdownItem.className = 'dropdown-item';
                        dropdownItem.href = '#';
                        dropdownItem.textContent = item;
                        dropdownItem.addEventListener('click', function (event) {
                            event.preventDefault(); // Prevent default link behavior
                            const newItem = createNavItem(this.textContent);
                            navbar.insertBefore(newItem, li.nextSibling);
                            extraItems.splice(extraItems.indexOf(this.textContent), 1);
                            div.removeChild(this);
                            if (extraItems.length === 0) {
                                li.parentNode.removeChild(li);
                            }
                            showHorizontalDiv(this.textContent, newItem.querySelector('a'));
                            setActiveNavItem(newItem.querySelector('a'));
                        });
                        div.appendChild(dropdownItem);
                    });

                    li.appendChild(a);
                    li.appendChild(div);
                    return li;
                }

                function setActiveNavItem(clickedItem) {
                    const navItems = document.querySelectorAll('.nav-link');
                    navItems.forEach(item => {
                        item.classList.remove('active');
                    });
                    clickedItem.classList.add('active');
                }

                function showHorizontalDiv(item, link) {
                    horizontalDiv.innerHTML = ''; // Clear previous content
                    const items = getSubItems(item); // Get the sub-items based on the main item

                    items.forEach(subItem => {
                        const a = document.createElement('a');
                        a.href = subItem.href;
                        a.textContent = subItem.text;
                        a.addEventListener('click', function (event) {
                            // Ensure default link behavior
                        });
                        horizontalDiv.appendChild(a);
                    });

                    // Position the horizontal div directly below the navbar
                    const navbarRect = document.querySelector('.navbar').getBoundingClientRect();
                    horizontalDiv.style.top = `${navbarRect.bottom}px`;
                    horizontalDiv.style.display = 'block'; // Show the div

                    setActiveSubItem(horizontalDiv.querySelector('a'), horizontalDiv); // Set default active sub-item
                }

                function setActiveSubItem(subItem, horizontalDiv) {
                    const subItems = horizontalDiv.querySelectorAll('a');
                    subItems.forEach(item => {
                        item.style.backgroundColor = 'gray';
                        item.innerHTML = item.textContent; // Remove arrow if exists
                    });
                    subItem.style.backgroundColor = 'darkgray';
                    const arrow = document.createElement('div');
                    arrow.classList.add('arrow-down');
                    subItem.appendChild(arrow);
                }

                function getSubItems(item) {
                    // Define sub-items for each main item with hrefs
                    switch (item) {
                        case 'Emails Marketing':
                            return [
                                
                                { text: 'Add Contacts', href: 'add-contacts.php' },
                                { text: 'Create Lists', href: 'email-listings.php' },
                                { text: 'Messaging', href: 'messaging.php' },
                                { text: 'Reports', href: 'reports.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'SEO':
                            return [
                                { text: 'KYC', href: 'kyc.php' },
                                { text: 'Ranking', href: 'ranking.php' },
                                { text: 'Tasks', href: 'tasks.php' },
                                { text: 'Reports', href: 'reports.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'Social Media':
                            return [
                                { text: 'KYC', href: 'kyc.php' },
                                { text: 'Calendar', href: 'calendar.php' },
                                { text: 'Content', href: 'content.php' },
                                { text: 'Posts', href: 'posts.php' },
                                { text: 'Reports', href: 'reports.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'Sales':
                            return [
                                { text: 'Leads', href: 'leads.php' },
                                { text: 'Proposals', href: 'proposals.php' },
                                { text: 'SLA', href: 'sla.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'Projects':
                            return [
                                { text: 'Assign', href: 'assign.php' },
                                { text: 'Tasks', href: 'tasks.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'Accounts':
                            return [
                                { text: 'Salary', href: 'salary.php' },
                                { text: 'Invoice', href: 'invoice.php' },
                                { text: 'Payments', href: 'payments.php' },
                                { text: 'Receiving', href: 'receiving.php' },
                                { text: 'P & L', href: 'pl.php' }
                            ];
                        case 'HR':
                            return [
                                { text: 'Applicants', href: 'applicants.php' },
                                { text: 'Messaging', href: 'messaging.php' },
                                { text: 'Job Post', href: 'job-post.php' },
                                { text: 'Attendance', href: 'attendance.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'Trainings':
                            return [
                                { text: 'FAQ', href: 'faq.php' },
                                { text: 'Blogs', href: 'blogs.php' },
                                { text: 'How To', href: 'how-to.php' },
                                { text: 'VDu', href: 'vdu.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'Admin':
                            return [
                                { text: 'Profile', href: 'profile.php' },
                                { text: 'Users', href: 'users.php' },
                                { text: 'Settings', href: 'settings.php' }
                            ];
                        case 'Contacts':
                            return [
                                { text: 'Add Contacts', href: 'add-contacts.php' },
                                { text: 'Contacts', href: 'contacts.php' },
                                { text: 'Types', href: 'types.php' },
                                { text: 'Sub types', href: 'sub-types.php' },
                                { text: 'Status', href: 'contacts-status.php' },
                            ];
                        default:
                            return [];
                    }
                }
            });
        </script>

        </body>
        </html>
