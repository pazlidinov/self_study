from django.db import models

# Create your models here.


class Members(models.Model):

    first_name = models.CharField(max_length=150)
    last_name = models.CharField(max_length=150)
    phone = models.IntegerField(null=True)
    joined_date = models.DateField(null=True)

    def __str__(self):
        return f'{self.first_name} {self.last_name}'
