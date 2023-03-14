from django.contrib import admin

from .models import Members

# Register your models here.

class MembersAdmin(admin.ModelAdmin):
    list_display=('first_name', 'last_name', 'phone', 'joined_date')


admin.site.register(Members, MembersAdmin)
