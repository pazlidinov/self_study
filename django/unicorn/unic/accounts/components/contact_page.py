from django_unicorn.components import UnicornView
from accounts.models import User


class ContactPageView(UnicornView):
    contacts = User.objects.none()
    user = User.objects.none()
    
    def __init__(self, *args, **kwargs):
        super().__init__(*args, **kwargs) 
        self.contacts=self.request.user.contacts.all()
        self.user=User.objects.exclude(pk=self.request.user.pk)